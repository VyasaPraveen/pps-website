"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { useEffect, useState } from "react";
import { NAV_LINKS, SITE } from "@/lib/site";
import { CloseIcon, MenuIcon, PhoneIcon } from "./Icons";
import { Logo } from "./Logo";

export function Navbar() {
  const pathname = usePathname();
  const [open, setOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 8);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  const closeMenu = () => setOpen(false);

  return (
    <header
      className={`sticky top-0 z-50 w-full transition-all ${
        scrolled
          ? "bg-white/90 backdrop-blur-lg shadow-[0_4px_24px_-12px_rgba(31,58,147,0.35)]"
          : "bg-white/70 backdrop-blur-md"
      }`}
    >
      <div className="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-brand-navy via-brand-violet to-solar-600" aria-hidden />
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="flex h-16 items-center justify-between md:h-20">
          <Link href="/" className="flex items-center gap-3 group" aria-label="Pragathi Power Solutions home">
            <Logo
              variant="mark"
              priority
              className="h-12 w-auto md:h-14 transition-transform group-hover:scale-105"
            />
            <span className="hidden sm:flex flex-col leading-tight">
              <span className="font-extrabold text-base md:text-lg text-brand-navy tracking-tight">
                Pragathi Power Solutions
              </span>
              <span className="text-[10px] md:text-[11px] uppercase tracking-[0.2em] text-solar-600 font-bold">
                Since 2012 · TATA Power Solar Partner
              </span>
            </span>
          </Link>

          <nav className="hidden lg:flex items-center gap-1">
            {NAV_LINKS.map((link) => {
              const active = pathname === link.href;
              return (
                <Link
                  key={link.href}
                  href={link.href}
                  className={`relative px-4 py-2 rounded-full text-sm font-semibold transition-colors ${
                    active
                      ? "text-solar-700 bg-solar-50"
                      : "text-brand-navy hover:text-solar-600 hover:bg-solar-50/60"
                  }`}
                >
                  {link.label}
                  {active && (
                    <span className="absolute -bottom-0.5 left-1/2 -translate-x-1/2 h-1 w-6 rounded-full bg-solar-500" />
                  )}
                </Link>
              );
            })}
          </nav>

          <div className="hidden md:flex items-center gap-2">
            <a
              href={SITE.phoneHref}
              className="hidden xl:inline-flex items-center gap-2 text-sm font-semibold text-brand-navy hover:text-solar-600 transition-colors"
            >
              <PhoneIcon size={18} />
              {SITE.phone}
            </a>
            <Link
              href="/contact"
              className="btn-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold"
            >
              Get Free Quote
            </Link>
          </div>

          <button
            type="button"
            className="lg:hidden inline-flex h-11 w-11 items-center justify-center rounded-xl bg-solar-50 text-brand-navy"
            aria-label="Toggle menu"
            aria-expanded={open}
            onClick={() => setOpen((v) => !v)}
          >
            {open ? <CloseIcon /> : <MenuIcon />}
          </button>
        </div>
      </div>

      {open && (
        <div className="lg:hidden border-t border-solar-100 bg-white/95 backdrop-blur-lg">
          <nav className="mx-auto max-w-7xl px-4 py-4 flex flex-col gap-1">
            {NAV_LINKS.map((link) => {
              const active = pathname === link.href;
              return (
                <Link
                  key={link.href}
                  href={link.href}
                  onClick={closeMenu}
                  className={`px-4 py-3 rounded-xl text-base font-semibold ${
                    active
                      ? "bg-solar-100 text-solar-700"
                      : "text-brand-navy hover:bg-solar-50"
                  }`}
                >
                  {link.label}
                </Link>
              );
            })}
            <div className="grid grid-cols-2 gap-3 pt-3">
              <a
                href={SITE.phoneHref}
                onClick={closeMenu}
                className="btn-outline inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-sm font-semibold"
              >
                <PhoneIcon size={18} />
                Call
              </a>
              <Link
                href="/contact"
                onClick={closeMenu}
                className="btn-primary inline-flex items-center justify-center px-4 py-3 rounded-xl text-sm font-semibold"
              >
                Get Quote
              </Link>
            </div>
          </nav>
        </div>
      )}
    </header>
  );
}
