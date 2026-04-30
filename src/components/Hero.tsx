import Link from "next/link";
import { SITE, STATS } from "@/lib/site";
import { ArrowRightIcon, CheckIcon, SunIcon, WhatsAppIcon } from "./Icons";
import { Logo } from "./Logo";

export function Hero() {
  return (
    <section className="relative overflow-hidden hero-gradient">
      <div className="absolute inset-0 grid-bg opacity-40" aria-hidden />
      <div
        className="absolute -top-40 -right-32 h-[500px] w-[500px] rounded-full sun-gradient opacity-50 blur-3xl"
        aria-hidden
      />
      <div
        className="absolute -bottom-32 -left-32 h-96 w-96 rounded-full brand-gradient opacity-30 blur-3xl"
        aria-hidden
      />

      <div className="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-12 pb-20 md:pt-20 md:pb-28">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          <div className="animate-fade-up">
            <span className="inline-flex items-center gap-2 rounded-full bg-white/85 backdrop-blur px-4 py-2 text-xs font-bold text-brand-navy shadow-sm border border-brand-navy/15">
              <span className="relative flex h-2 w-2">
                <span className="absolute inline-flex h-full w-full rounded-full bg-solar-400 opacity-75 animate-ping" />
                <span className="relative inline-flex h-2 w-2 rounded-full bg-solar-500" />
              </span>
              {SITE.designation}
            </span>

            <h1 className="mt-6 text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-extrabold tracking-tight text-brand-navy leading-[1.05]">
              Power from the Sun{" "}
              <span className="text-shimmer">to Power Everyone</span>
            </h1>

            <p className="mt-3 text-lg md:text-xl font-semibold text-solar-600 italic">
              Ghar Ghar mei Suraj ki Shakti
            </p>

            <p className="mt-6 text-base md:text-lg text-slate-700 leading-relaxed max-w-xl">
              Tirupati&apos;s trusted solar partner since 2012. End-to-end design,
              installation and maintenance of rooftop solar, water heaters, street
              lights and pumpsets — backed by TATA Power Solar quality.
            </p>

            <ul className="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm font-medium text-slate-700">
              {[
                "Up to ₹78,000 PM Surya Ghar subsidy",
                "13+ years experience",
                "End-to-end paperwork handled",
              ].map((item) => (
                <li key={item} className="inline-flex items-center gap-2">
                  <span className="inline-flex h-5 w-5 items-center justify-center rounded-full bg-eco-500/15 text-eco-600">
                    <CheckIcon size={14} />
                  </span>
                  {item}
                </li>
              ))}
            </ul>

            <div className="mt-8 flex flex-wrap items-center gap-3">
              <Link
                href="/contact"
                className="btn-primary inline-flex items-center gap-2 rounded-full px-6 py-3.5 text-sm font-semibold"
              >
                Get a Free Quote
                <ArrowRightIcon size={18} />
              </Link>
              <a
                href={SITE.whatsapp}
                target="_blank"
                rel="noopener noreferrer"
                className="inline-flex items-center gap-2 rounded-full bg-[#25D366] px-6 py-3.5 text-sm font-semibold text-white shadow-lg hover:scale-105 transition-transform"
              >
                <WhatsAppIcon size={18} />
                WhatsApp Us
              </a>
              <Link
                href="/services"
                className="btn-outline inline-flex items-center gap-2 rounded-full px-6 py-3.5 text-sm font-semibold"
              >
                Explore Services
              </Link>
            </div>
          </div>

          <div className="relative animate-fade-up [animation-delay:120ms]">
            <SolarVisual />
          </div>
        </div>

        <div className="relative mt-14 grid grid-cols-2 md:grid-cols-4 gap-4">
          {STATS.map((stat) => (
            <div
              key={stat.label}
              className="glass rounded-2xl p-5 text-center shadow-sm"
            >
              <p className="text-3xl md:text-4xl font-extrabold text-brand-navy">
                {stat.value}
                <span className="text-solar-500">{stat.suffix}</span>
              </p>
              <p className="mt-1 text-xs md:text-sm font-semibold text-slate-600 uppercase tracking-wide">
                {stat.label}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

function SolarVisual() {
  return (
    <div className="relative aspect-square max-w-md mx-auto">
      <div className="absolute inset-0 flex items-center justify-center">
        <div className="relative h-72 w-72 sm:h-80 sm:w-80">
          <div className="absolute inset-0 rounded-full sun-gradient animate-sun-pulse" />
          <div className="absolute inset-6 rounded-full bg-white shadow-2xl flex items-center justify-center p-8">
            <Logo variant="mark" priority className="w-full h-auto" />
          </div>
          <div className="absolute -inset-1 rounded-full border-2 border-dashed border-solar-400/40 animate-solar-spin pointer-events-none" />
        </div>
      </div>

      <div className="absolute top-6 -left-2 sm:left-0 glass rounded-2xl p-4 shadow-lg animate-float-slow w-44">
        <p className="text-xs font-semibold text-slate-500">Generation Today</p>
        <p className="mt-1 text-2xl font-bold text-eco-600">24.6 kWh</p>
        <div className="mt-2 h-1.5 rounded-full bg-eco-100 overflow-hidden">
          <div className="h-full w-3/4 bg-gradient-to-r from-eco-500 to-eco-600 rounded-full" />
        </div>
      </div>

      <div className="absolute bottom-6 -right-2 sm:right-0 glass rounded-2xl p-4 shadow-lg animate-float-slow [animation-delay:1.5s] w-48">
        <p className="text-xs font-semibold text-slate-500">Monthly Savings</p>
        <p className="mt-1 text-2xl font-bold text-solar-600">₹3,250</p>
        <p className="mt-1 text-xs text-slate-500">vs grid electricity</p>
      </div>

      <div className="absolute top-1/2 right-2 sm:right-4 -translate-y-1/2 glass rounded-2xl p-3 shadow-lg animate-float-slow [animation-delay:0.7s]">
        <p className="text-xs font-semibold text-eco-600">CO₂ Saved</p>
        <p className="text-lg font-bold text-brand-navy">1.2 t / yr</p>
      </div>

      <div className="absolute -top-4 right-4 inline-flex items-center gap-1.5 rounded-full bg-white shadow-lg px-3 py-1.5 border border-solar-200 animate-float-slow [animation-delay:2.2s]">
        <SunIcon size={14} className="text-solar-500" />
        <span className="text-[11px] font-bold text-brand-navy uppercase tracking-wider">Since 2012</span>
      </div>
    </div>
  );
}
