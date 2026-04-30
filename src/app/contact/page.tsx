import type { Metadata } from "next";
import { PageHeader } from "@/components/PageHeader";
import { ContactForm } from "@/components/ContactForm";
import { FAQAccordion } from "@/components/FAQAccordion";
import { SectionHeader } from "@/components/SectionHeader";
import { SITE } from "@/lib/site";
import {
  ClockIcon,
  FacebookIcon,
  InstagramIcon,
  LinkedInIcon,
  MailIcon,
  PhoneIcon,
  PinIcon,
  WhatsAppIcon,
  YoutubeIcon,
} from "@/components/Icons";

export const metadata: Metadata = {
  title: "Contact Us",
  description:
    "Talk to Pragathi Power Solutions — Tirupati's leading solar power partner. Free consultation, quote in 24 hours.",
};

export default function ContactPage() {
  return (
    <>
      <PageHeader
        title="Talk to a real solar engineer."
        description="Free consultation, transparent pricing, end-to-end execution. Reach us by phone, WhatsApp, email or the form below — we respond within hours."
        crumbs={[{ label: "Home", href: "/" }, { label: "Contact" }]}
      />

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid gap-10 lg:grid-cols-5">
          <aside className="lg:col-span-2 space-y-4">
            <ContactCard
              icon={<PhoneIcon size={22} />}
              title="Call Us"
              line={SITE.phone}
              href={SITE.phoneHref}
              accent
            />
            <ContactCard
              icon={<WhatsAppIcon size={22} />}
              title="WhatsApp"
              line="Quick quote on chat"
              href={SITE.whatsapp}
              external
            />
            <ContactCard
              icon={<MailIcon size={22} />}
              title="Email"
              line={SITE.email}
              href={`mailto:${SITE.email}`}
            />
            <ContactCard
              icon={<PinIcon size={22} />}
              title="Visit Office"
              line={SITE.address}
            />
            <ContactCard
              icon={<ClockIcon size={22} />}
              title="Working Hours"
              line="Mon - Sat: 9:00 AM - 7:00 PM"
            />

            <div className="rounded-3xl bg-white p-6 border border-solar-100 shadow-sm">
              <p className="text-sm font-semibold text-sky-deep">Follow us</p>
              <div className="mt-3 flex gap-2">
                <SocialIcon href={SITE.social.facebook} label="Facebook"><FacebookIcon size={18} /></SocialIcon>
                <SocialIcon href={SITE.social.instagram} label="Instagram"><InstagramIcon size={18} /></SocialIcon>
                <SocialIcon href={SITE.social.youtube} label="YouTube"><YoutubeIcon size={18} /></SocialIcon>
                <SocialIcon href={SITE.social.linkedin} label="LinkedIn"><LinkedInIcon size={18} /></SocialIcon>
              </div>
            </div>
          </aside>

          <div className="lg:col-span-3">
            <ContactForm />
          </div>
        </div>
      </section>

      <section className="section-pad bg-gradient-to-b from-solar-50 to-white">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <SectionHeader
            eyebrow="Find Us"
            title="Visit our Tirupati office"
            description="Drop in for a chat, a system tour, or to see real components up close."
          />
          <div className="mt-12 overflow-hidden rounded-3xl border border-solar-100 shadow-md aspect-[16/9] bg-solar-100">
            <iframe
              title="Pragathi Power Solutions, Tirupati office map"
              src="https://www.openstreetmap.org/export/embed.html?bbox=79.41%2C13.62%2C79.45%2C13.66&amp;layer=mapnik&amp;marker=13.6404%2C79.4290"
              className="w-full h-full"
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
            />
          </div>
          <p className="mt-3 text-xs text-slate-500 text-center">
            Approximate location: Ramanujam Circle, Tirupati 517501.
          </p>
        </div>
      </section>

      <section className="section-pad">
        <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid gap-10 lg:grid-cols-2">
          <SectionHeader
            eyebrow="FAQ"
            title="Quick answers before you call"
            description="Have a different question? Drop it in the form above — we respond within a few hours."
            align="left"
          />
          <FAQAccordion />
        </div>
      </section>

      <div className="h-16" />
    </>
  );
}

function ContactCard({
  icon,
  title,
  line,
  href,
  external,
  accent,
}: {
  icon: React.ReactNode;
  title: string;
  line: string;
  href?: string;
  external?: boolean;
  accent?: boolean;
}) {
  const inner = (
    <div
      className={`rounded-3xl p-5 border shadow-sm card-hover ${
        accent
          ? "sun-gradient text-white border-transparent"
          : "bg-white border-solar-100"
      }`}
    >
      <div className="flex items-center gap-4">
        <span
          className={`inline-flex h-12 w-12 items-center justify-center rounded-2xl ${
            accent ? "bg-white/20 text-white" : "bg-solar-100 text-solar-600"
          }`}
        >
          {icon}
        </span>
        <div className="min-w-0">
          <p className={`text-xs font-semibold uppercase tracking-wider ${accent ? "text-white/80" : "text-slate-500"}`}>
            {title}
          </p>
          <p className={`font-semibold truncate ${accent ? "text-white" : "text-sky-deep"}`}>
            {line}
          </p>
        </div>
      </div>
    </div>
  );

  if (!href) return inner;
  return (
    <a
      href={href}
      target={external ? "_blank" : undefined}
      rel={external ? "noopener noreferrer" : undefined}
      className="block"
    >
      {inner}
    </a>
  );
}

function SocialIcon({
  href,
  label,
  children,
}: {
  href: string;
  label: string;
  children: React.ReactNode;
}) {
  return (
    <a
      href={href}
      target="_blank"
      rel="noopener noreferrer"
      aria-label={label}
      className="inline-flex h-10 w-10 items-center justify-center rounded-full bg-solar-100 text-solar-700 hover:bg-solar-500 hover:text-white transition-colors"
    >
      {children}
    </a>
  );
}
