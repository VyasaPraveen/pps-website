import Link from "next/link";
import { NAV_LINKS, SERVICES, SITE } from "@/lib/site";
import { Logo } from "./Logo";
import {
  FacebookIcon,
  InstagramIcon,
  LinkedInIcon,
  MailIcon,
  PhoneIcon,
  PinIcon,
  YoutubeIcon,
} from "./Icons";

export function Footer() {
  const year = new Date().getFullYear();
  return (
    <footer className="relative mt-16 bg-brand-navy-deep text-slate-200 overflow-hidden">
      <div className="absolute inset-0 grid-bg opacity-[0.05]" aria-hidden />
      <div className="absolute -top-32 -right-32 h-72 w-72 rounded-full sun-gradient opacity-30 blur-3xl" aria-hidden />
      <div className="absolute -bottom-40 -left-40 h-96 w-96 rounded-full bg-brand-violet opacity-30 blur-3xl" aria-hidden />
      <div className="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-16 pb-8">
        <div className="grid gap-10 lg:grid-cols-4">
          <div className="space-y-4">
            <div className="inline-flex bg-white/95 rounded-2xl p-3 shadow-lg">
              <Logo variant="mark" className="h-16 w-auto" />
            </div>
            <p className="font-extrabold text-lg text-white">Pragathi Power Solutions</p>
            <p className="text-sm text-slate-300 leading-relaxed">
              {SITE.designation}. Powering homes, farms and businesses across Tirupati and Rayalaseema since 2012.
            </p>
            <div className="flex items-center gap-3 pt-2">
              <a href={SITE.social.facebook} target="_blank" rel="noopener noreferrer" aria-label="Facebook" className="h-9 w-9 inline-flex items-center justify-center rounded-full bg-white/10 hover:bg-solar-500 transition-colors">
                <FacebookIcon size={18} />
              </a>
              <a href={SITE.social.instagram} target="_blank" rel="noopener noreferrer" aria-label="Instagram" className="h-9 w-9 inline-flex items-center justify-center rounded-full bg-white/10 hover:bg-solar-500 transition-colors">
                <InstagramIcon size={18} />
              </a>
              <a href={SITE.social.youtube} target="_blank" rel="noopener noreferrer" aria-label="YouTube" className="h-9 w-9 inline-flex items-center justify-center rounded-full bg-white/10 hover:bg-solar-500 transition-colors">
                <YoutubeIcon size={18} />
              </a>
              <a href={SITE.social.linkedin} target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" className="h-9 w-9 inline-flex items-center justify-center rounded-full bg-white/10 hover:bg-solar-500 transition-colors">
                <LinkedInIcon size={18} />
              </a>
            </div>
          </div>

          <div>
            <h3 className="font-bold text-white mb-4 text-sm uppercase tracking-widest">Quick Links</h3>
            <ul className="space-y-2.5 text-sm">
              {NAV_LINKS.map((link) => (
                <li key={link.href}>
                  <Link href={link.href} className="text-slate-300 hover:text-solar-300 transition-colors">
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h3 className="font-bold text-white mb-4 text-sm uppercase tracking-widest">Our Services</h3>
            <ul className="space-y-2.5 text-sm">
              {SERVICES.map((s) => (
                <li key={s.slug}>
                  <Link href={`/services#${s.slug}`} className="text-slate-300 hover:text-solar-300 transition-colors">
                    {s.title}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h3 className="font-bold text-white mb-4 text-sm uppercase tracking-widest">Get in Touch</h3>
            <ul className="space-y-3 text-sm">
              <li className="flex items-start gap-3">
                <PinIcon size={18} className="mt-0.5 text-solar-300 shrink-0" />
                <span className="text-slate-300">{SITE.address}</span>
              </li>
              <li className="flex items-center gap-3">
                <PhoneIcon size={18} className="text-solar-300 shrink-0" />
                <a href={SITE.phoneHref} className="text-slate-300 hover:text-solar-300 transition-colors">
                  {SITE.phone}
                </a>
              </li>
              <li className="flex items-center gap-3">
                <MailIcon size={18} className="text-solar-300 shrink-0" />
                <a href={`mailto:${SITE.email}`} className="text-slate-300 hover:text-solar-300 transition-colors">
                  {SITE.email}
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div className="mt-12 pt-6 border-t border-white/10 flex flex-col md:flex-row gap-3 items-center justify-between text-xs text-slate-400">
          <p>© {year} {SITE.name}. All rights reserved.</p>
          <p className="flex items-center gap-2">
            <span className="inline-block h-2 w-2 rounded-full bg-solar-400 animate-pulse" />
            {SITE.designation}
          </p>
        </div>
      </div>
    </footer>
  );
}
